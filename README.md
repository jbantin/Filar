# Filar

Filar is a comprehensive productivity application built using Laravel. This project serves as my first Laravel application and is designed to help organize tasks, dates, and notes in an intuitive interface.

## Features

### Tasks Management
- Create, update, and delete tasks
- Organize tasks into Kanban-style columns (Pending, In Progress, Completed)
- Move tasks between different status columns
- Clean and responsive design using Tailwind CSS

### Dates Management
- Create and manage important dates with optional time
- Add titles and descriptions to dates
- View dates in a card-based layout
- Edit and delete existing dates
- Time-based scheduling support

### Notes Management
- Create, edit, and delete personal notes
- Simple text-based note storage
- Organize notes chronologically
- Full CRUD operations for note management

### User Authentication
- User registration and login system
- Secure user sessions
- Personal data isolation (users only see their own content)

## Technologies Used

- **PHP** (Primary language)
- **Laravel** (Backend framework)
- **Livewire** (Dynamic frontend components)
- **Tailwind CSS** (Frontend styling)
- **SQLite** (Database)
- **Blade Templates** (Laravel templating engine)

## Installation

To set up Filar locally, follow these steps:

1. Clone the repository:
   ```bash
   git clone https://github.com/jbantin/Filar.git

    Navigate to the project directory:
    bash

cd Filar

Install dependencies:
bash

composer install
npm install
npm run dev

Set up your .env file:

    Copy .env.example to .env.
    Configure your environment variables as needed (default database is SQLite).

Run migrations to set up the database:
bash

php artisan migrate

(Optional) Seed the database with sample data:
bash

php artisan db:seed

Start the development server:
bash

    php artisan serve

    Access the app in your browser at http://localhost:8000.

## Database Structure

The application uses the following main tables:
- **users** - User authentication and profile information
- **tasks** - Task management with status tracking
- **dates** - Date entries with optional time and descriptions
- **notes** - Simple text-based note storage

All user data is properly isolated to ensure privacy and security.

## Usage

### Getting Started
1. Register a new account or login with existing credentials
2. Access the dashboard to view all your tasks, dates, and notes

### Tasks Management
- Add new tasks using the form on the dashboard
- Move tasks between columns (Pending → In Progress → Completed)
- Delete tasks when no longer needed

### Dates Management
- Navigate to the "Dates" section from the navigation menu
- Create new dates with optional time specifications
- Add titles and descriptions for better organization
- Edit or delete existing dates as needed

### Notes Management
- Access the "Notes" section to manage your personal notes
- Create simple text-based notes for quick reference
- Edit and organize notes chronologically

Contributing

This is a personal project, but contributions are welcome! Feel free to fork the repository and submit pull requests.
License

This project does not currently have a specific license. Feel free to use it as a reference or for personal projects.

Thank you for checking out Filar!
Code


Let me know if you'd like to make any adjustments or add more details!
