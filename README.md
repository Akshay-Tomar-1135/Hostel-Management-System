# Hostel Management System

This is a hostel management system project built using PHP and JavaScript. It allows students to register on the website and book a room in their preferred hostel from the available rooms. Each hostel is assigned a unique manager who has privileges to handle and view the details of students assigned to their hostel. The admin has the privilege to handle and view details of every registered student.

## Features

- Student Registration: Students can create an account on the website by providing their personal information.
- Room Booking: Registered students can browse through the different hostels and apply for a room in that hostel and wait for hostel manager to verify student's detail and assign a room to the student.
- Hostel Managers: Each hostel is assigned a unique manager who can access and manage the details of students assigned to their hostel. In means of manage, manager can either accept student's application and assign a room to student or reject student's application.
- Admin Privileges: The admin has the authority to view and manage the details of every registered student, regardless of the hostel.
- Contact facilities: Students can personly message and ask their queries to respective hostel manager/admin through their deshboard and also manager/admin can reply to their queries or complaints and resolve their issues.

## Installation

1. Clone the repository:

```shell
git clone https://github.com/Akshay-Tomar-1135/Hostel-Management-System.git
```

2. Move into the project directory:

```shell
cd Hostel-Management-System
```

3. Set up a local web server or use a tool like XAMPP to host the project locally.

4. Import the database:
   - Create a new MySQL database.
   - Import the SQL file `hostel_management_system.sql` located in the `database` directory into the newly created database.

5. Update the database configuration:
   - Open the `config.php` file located in the `includes` directory.
   - Update the database connection details (host, username, password, and database name) to match your local environment.

6. Start the web server and access the application through your browser.

## Usage

1. Open your web browser and navigate to the application URL.
2. Register as a student using the provided registration form.
3. Log in with your registered credentials.
4. Browse through the available hostels and apply for a room for booking and wait until your hostel manager verifies your details and assign a room to you.
5. After room allocation you can message hostel manager for any queries and resolve your issues regarding allocated room.
6. Hostel managers can log in to view and manage the details of students assigned to their hostel.
7. The application will be shown to manager's dashboard and allow the manager to either accept application and allocate room to applied student or reject the application.
8. The admin can log in to access and manage the details of all registered students.

## Contributing

Contributions to this project are welcome. To contribute, follow these steps:

1. Fork the repository.
2. Create a new branch.
3. Make your changes and commit them.
4. Push your changes to your forked repository.
5. Submit a pull request.

Please ensure your pull request follows the project's coding conventions and guidelines.

## License

This project is licensed under the [MIT License](LICENSE).

## Acknowledgements

This project was developed by [Akshay Tomar](https://github.com/Akshay-Tomar-1135) as part of a hostel management system implementation.

For any further information or inquiries, please contact the project maintainer.

### For more details regarding the system please refer to SDD, SRS, UserManual of the system in Documentation folder.
