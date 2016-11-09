# GiftTheCode. October 21-23, 2016.
A centralized web tool to track patients' learning progress.
Authors: Alan0, Alan1, Mark, Marko, Jackson

## To Run

- Have your Apache server, MySQL, and PHP setup
- Clone the repository 
- Enter your MySQL server credentials in quizResultsHandler.php and dashboard2.php:

```
$ cd GiftTheCode
$ $link = mysqli_connect("localhost", "root", "", "bloorview");
$ cd dashboardUI
$ $link = mysqli_connect("localhost", "root", "", "bloorview");
```

- Start your Apache server:
```
$ sudo service apache2 start
```

- Go to localhost in your browser and view the page 
- Stop your server:
```
$ sudo service apache2 stop
```
