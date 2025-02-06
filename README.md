# Notes Application

A simple and elegant web-based notes application built with PHP and MySQL. This application allows users to register, log in, create, edit, and delete notes. The notes are displayed in a clean, card-based layout.

![Screenshot 2025-02-06 092755](https://github.com/user-attachments/assets/a9dcdef4-856b-4e3b-909e-0e88150f0d8b)

## Features

- **User Authentication**: Register and log in to access your notes.
- **Create Notes**: Add new notes with a title and content.
- **Edit Notes**: Update existing notes.
- **Delete Notes**: Remove notes you no longer need.
- **Responsive Design**: Works seamlessly on desktop and mobile devices.
- **Secure**: Passwords are hashed for security.

## Technologies Used

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL
- **Other Tools**: Git, XAMPP (for local development)

## Prerequisites

Before you begin, ensure you have the following installed:

- PHP (version 7.0 or higher)
- MySQL
- A web server (e.g., Apache, Nginx)
- Composer (optional, for dependency management)

## Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/KS-Manoj9088/NOTES_APPLICATION.git
   cd notes-app

2. Set up the database : Create a new MySQL database named notes_app.
3. Configure the database connection :-
    $host = 'localhost'; // Database host
    $dbname = 'notes_app'; // Database name
    $username = 'root'; // Database username 
    $password = ''; // Database password
4. Run the application :
   Place the project folder in your web server's root directory (e.g., htdocs for XAMPP).
   Start your web server and MySQL server.
   Open your browser and navigate to http://localhost/PROJECT/index.html.

USAGE : 

1. Register: Create a new account by clicking "Sign Up" on the homepage.
2. Log In: Use your credentials to log in.
3. Add Notes: Click the "Add Note" button on the dashboard to create a new note.
4. Edit Notes: Click the "Edit" button on any note to update its content.
5. Delete Notes: Click the "Delete" button on any note to remove it.

File Structure :

PROJECT/
├── index.html                # Landing page 
├── login.php                 # User login
├── signup.php                # User registration
├── logout.php                # User logout
├── dashboard.php             # Main dashboard (displays notes)
├── add_note.php              # Add a new note
├── edit_note.php             # Edit an existing note
├── delete_note.php           # Delete a note
├── styles/                   # CSS files
│   ├── style.css             # Main styles
│   └── auth.css              # Styles for login/signup pages
├── scripts/                  # JavaScript files
│   └── script.js             # Optional JavaScript
├── includes/                 # Reusable PHP components
│   ├── db.php                # Database connection
│   ├── header.php            # Common header
│   ├── footer.php            # Common footer
│   └── auth_functions.php    # Authentication functions
├── assets/                   # Static assets (images, icons, etc.)
│   └── logo.png              # Example logo
└── README.md                 # Project documentation

Contributing :

Contributions are welcome! If you'd like to contribute, please follow these steps:

1. Fork the repository.
2. Create a new branch (git checkout -b feature/YourFeatureName).
3. Commit your changes (git commit -m 'Add some feature').
4. Push to the branch (git push origin feature/YourFeatureName).
5. Open a pull request.


Screenshots :

LOGIN PAGE :

![Screenshot 2025-02-06 092755](https://github.com/user-attachments/assets/24793dcf-bfde-45d3-8ad1-582e01d0c5bb)

USER SIGN UP (If not account exists):

![Screenshot 2025-02-06 092913](https://github.com/user-attachments/assets/98998de5-dbd0-4693-bab6-8b2d0904b732)

USER LOGIN IN :

![Screenshot 2025-02-06 092840](https://github.com/user-attachments/assets/31033a88-14c2-4415-b5b8-9c3cb55af76a)

DASHBOARD :

![Screenshot 2025-02-06 092854](https://github.com/user-attachments/assets/3c662cce-f333-4209-ae71-331b711294ee)
