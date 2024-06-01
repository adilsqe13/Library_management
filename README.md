# Library Management System

This is a Library Management System developed in PHP. It allows an admin to manage students and books, issue books to students, and track book returns with penalty calculations for late returns.

## Features

- Admin login
- Add, edit, and delete student details
- Add, edit, and delete book details
- Issue books to students for a maximum period of one week
- Calculate and impose a penalty of Rs. 1/- per day for late returns

## Requirements

- PHP 7.0 or higher
- MySQL 5.6 or higher
- Web server (e.g., Apache)

## Installation

1. Clone the repository to your web server directory:
    ```sh
    git clone https://github.com/yourusername/library-management-system.git
    ```

2. Navigate to the project directory:
    ```sh
    cd library-management-system
    ```

3. Import the `database.sql` file into your MySQL database to set up the required tables.

4. Update the `config.php` file with your database credentials:
    ```php
    <?php
    $servername = "your_servername";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database";
    ?>
    ```

5. Start your web server and open the project in your web browser:
    ```sh
    http://localhost/library-management-system
    ```

## Usage

1. **Admin Login**: Access the admin login page and enter your credentials to log in.

2. **Add Student**: Navigate to the "Add Student" section, fill in the student details, and submit.

3. **Add Book**: Navigate to the "Add Book" section, fill in the book details, and submit.

4. **Issue Book**: Navigate to the "Issue Book" section, select the student and the book, and submit. Books are issued for one week.

5. **Edit Details**: Navigate to the "Edit Student" or "Edit Book" sections to update existing details.

6. **Delete**: Navigate to the "Delete Student" or "Delete Book" sections to remove entries from the system.

## Penalty Calculation

- A penalty of Rs. 1/- per day is imposed for books returned after the one-week period.
- The system automatically calculates and displays the penalty amount based on the return date.


*Add Book*

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.

## Contributing

We welcome contributions to enhance the system. Please fork the repository and submit a pull request.

## Contact

For any inquiries or issues, please contact [your email@example.com].

