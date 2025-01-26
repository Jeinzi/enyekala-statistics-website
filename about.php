<!doctype html>
<html lang="en">
<head>
  <title>About Enyekala Statistics</title>
  <?php include("include/head.php"); ?>
</head>
<body>
  <div class="container py-4">
    <header class="border-bottom pb-3 mb-4">
      <?php include("include/page-title.php"); ?>
    </header>
    <p>@MustTest: Yes, this site is meant to be public ;)</p>

    <h4>Source Code</h4>
    <p>This project consists of two parts:
      <ul>
        <li><a href="https://github.com/Jeinzi/enyekala-analyzer">Python scripts</a> that parse the server chatlogs</li>
        <li><a href="https://github.com/Jeinzi/enyekala-statistics-website">The website</a> itself</li>
      </ul>
      
      Every day, a cron job launches <code>update.sh</code>. This calls <code>download.py</code>, which saves yesterday's chatlog to the disk. Afterwards, <code>analyze.py</code> parses all chatlogs and writes the results to an SQL database, which is the data source for the website.
    </p>

    <h4>Raw Data</h4>
    <p>A current database dump (the output of the Python scripts) can be downloaded <a href="/download/">here</a>.</p>
  </div>
</body>
</html>
