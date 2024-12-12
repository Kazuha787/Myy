
<?php

// Function to clear screen based on OS
function clearScreen() {
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        system('cls');
    } else {
        system('clear');
    }
}

// Function to generate random user agent
function generateUserAgent() {
    $os = ['Windows', 'Linux', 'iOS', 'Android'];
    $versions = ['8', '9', '10', '11', '12', '13', '14'];
    $devices = ['Samsung', 'Motorola', 'Xiaomi', 'Huawei', 'OnePlus'];
    
    $selectedOs = $os[array_rand($os)];
    
    if ($selectedOs === 'Android') {
        $version = $versions[array_rand($versions)];
        $device = $devices[array_rand($devices)];
        $userAgent = "Mozilla/5.0 (Linux; Android $version; $device) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Mobile Safari/537.36";
    } else {
        $userAgent = "Mozilla/5.0 ($selectedOs NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36";
    }
    
    return $userAgent . rand(1000000, 9999999);
}

// Function to print colored text
function printColored($text, $color) {
    return "\033[" . $color . "m" . $text . "\033[0m";
}

// Color codes
$green = "32";
$red = "31"; 
$yellow = "33";
$blue = "34";

// Function to print banner
function printBanner() {
    global $green;
    $banner = "
-------------------------------------------------
███████  █████  ██    ██  █████  ███    ██ 
██      ██   ██ ██    ██ ██   ██ ████   ██ 
███████ ███████ ██    ██ ███████ ██ ██  ██ 
     ██ ██   ██  ██  ██  ██   ██ ██  ██ ██ 
███████ ██   ██   ████   ██   ██ ██   ████ 
-------------------------------------------------

     - NOT PIXEL AD WATCH -
              
              - VERSION 2.0 -
    
- MADE BY : SAVAN
- Telegram: @savanop
- channel: https://t.me/savanop121

- Note: If you encounter the issue \\"URL not found\\"
  kindly ignore it.  
- PX Points will be added to your account within 20 seconds.

-------------------------------------------------
";
    
    echo printColored($banner, $green);
}

function incrementPoints($userId, $pointsFile = 'users.json') {
    if (file_exists($pointsFile)) {
        $users = json_decode(file_get_contents($pointsFile), true);

        if (isset($users[$userId])) {
            // Increment the user's points by 16 (1 PX = 16 PX conversion)
            $users[$userId]['points'] = isset($users[$userId]['points']) ? $users[$userId]['points'] + 16 : 16;
            file_put_contents($pointsFile, json_encode($users, JSON_PRETTY_PRINT));
            echo printColored("Success: 16 PX Points added to user $userId. Total Points: {$users[$userId]['points']}", $green);
        } else {
            echo printColored("Error: User ID $userId not found.", $red);
        }
    } else {
        echo printColored("Error: Points file not found.", $red);
    }
}

// Main script starts here
clearScreen();
printBanner();

$usersFile = 'users.json';

// Assuming the $userId comes from some logic (for demo purposes, hardcoding one)
$userId = '1884968483';  // Example user ID

incrementPoints($userId);  // Increment points for the user

?>
