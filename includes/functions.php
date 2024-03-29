<?php


session_start();

if (isset($_GET['a']) && $_GET['a'] == 'logout') {
    unset($_SESSION['user']);
    redirect('login.php');
}

include_once 'config.php';
include_once 'connection.php';
global $pdo;
$conn = $pdo->open();


function redirect($location)
{
    echo "<script>window.location.href='" . $location . "'</script>";
}

function login($user_level)
{
    global $conn;

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = 'SELECT * FROM users WHERE username = ? LIMIT 1';
        $stmt = $conn->prepare($query);
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        //Check if username is correct
        if ($user) {
            // Check if password is correct
            if (password_verify($password, $user->password) && $user_level == $user->level) {
                //Storing user in session
                $_SESSION['user'] = $user->id;
                $_SESSION['level'] = $user->level;
                redirect('index.php');
            } else {
                return "<p class='text-danger fw-bold m-0 p-0'>Username or password is wrong!</p>";
            }
        } else {
            return "<p class='text-danger fw-bold m-0 p-0'>Username or password is wrong!</p>";
        }
    }
}

function findById($table, $id)
{
    global $conn;

    $query = "SELECT * FROM {$table} WHERE id = ? LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function findByQuery($query)
{
    global $conn;

    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetch();
}

function findAllByQuery($query)
{
    global $conn;

    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
}

function findAll($table)
{
    global $conn;

    $query = "SELECT * FROM {$table}";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
}

function valueParams($length)
{
    $params = "";
    for ($i = 0; $i < $length; $i++) {
        $params .= "?";
        $params .= $i !== $length - 1 ? "," : "";
    }

    return $params;
}

function insert($table, $data)
{
    global $conn;

    $query = "INSERT INTO {$table} (" . implode(',', array_keys($data)) . ") VALUES (" . valueParams(count($data)) . ")";
    $stmt = $conn->prepare($query);
    $stmt->execute(array_values($data));

    return $conn->lastInsertId();
}

function update($table, $data, $idCol, $idColVal)
{
    global $conn;

    $properties_pairs = [];
    $properties_values = [];
    foreach ($data as $key => $value) {
        $properties_pairs[] = "{$key}=?";
        $properties_values[] = $value;
    }

    $sql = "UPDATE  " . $table . "  SET ";
    $sql .= implode(", ", $properties_pairs);
    $sql .= " WHERE " . $idCol . " = '" . $idColVal . "'";

    $stmt = $conn->prepare($sql);
    if ($stmt->execute($properties_values)) {
        return true;
    } else {
        return false;
    }
}

function delete($table, $idCol, $idVal)
{
    global $conn;

    $query = "DELETE FROM {$table} WHERE {$idCol} = '{$idVal}'";
    $stmt = $conn->prepare($query);
    if ($stmt->execute())
        return true;
    else
        return false;
}

function findUserByEmail($email)
{
    return findByQuery("SELECT * FROM users WHERE email = '{$email}' LIMIT 1");
}

function findAllUsers()
{
    return findAllByQuery("SELECT * FROM users");
}

function getUserStation() {
    return findByQuery("SELECT * FROM user_station WHERE user_id = " . $_SESSION['user']);
}

function getUserCountry() {
    return findByQuery("SELECT * FROM user_country WHERE user_id = " . $_SESSION['user']);
}

function countryStations() {
    $country = getUserCountry();
    $stations = findAllByQuery("SELECT * FROM stations WHERE country_id = " . $country->country_id);
    if(empty($stations) || empty($country)) {
        return null;
    }else {
        return array_column($stations, "id");
    }
}

function timeAgo($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function getSettings($value) {
    $settings = findAll("settings");

    return $settings[array_search($value, array_column($settings, "name"))]->value;
}