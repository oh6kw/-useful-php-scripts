<?php
// Get the visitor's IP address
$ip = $_SERVER['REMOTE_ADDR'];

// Try to get the DNS name
$dns = @gethostbyaddr($ip);

// Get the visitor's browser information
$userAgent = $_SERVER['HTTP_USER_AGENT'];

// Set the filename to store the data
$file = "ip_log.txt";

// Open the file for writing
$fp = fopen($file, "a");

// Write the data to the file
fwrite($fp, "IP: $ip, DNS: $dns, Browser: $userAgent, Time: " . date("Y-m-d H:i:s") . "\n");

// Close the file
fclose($fp);

// Display the information on the page
echo "<h2>Visitor Information</h2>";
echo "<p>IP Address: $ip</p>";
echo "<p>DNS Name: $dns</p>";
echo "<p>Browser: $userAgent</p>";

// Count the lines in the file
$lineCount = 0;
$handle = fopen($file, "r");
if ($handle !== false) {
    while (($line = fgets($handle)) !== false) {
        $lineCount++;
    }
    fclose($handle);
}

// Display the log and line count
echo "<h2>Log (Visitors count: $lineCount)</h2>";
echo "<pre>";
readfile($file);
echo "</pre>";
?>
