# To-Do List Application

Welcome to the To-Do List Application! This project is a simple and efficient to-do list manager that helps you keep track of your tasks. It uses HTML, CSS, and JavaScript for the frontend, and PHP for the backend. The application leverages a REST API created using PHP to manage and synchronize tasks between the client and server. 

## Features

- **Add Tasks**: Users can add new tasks to their to-do list.
- **Delete Tasks**: Users can remove tasks that are no longer needed.
- **Check/Uncheck Tasks**: Users can mark tasks as completed or incomplete.
- **Daily Refresh**: The to-do list is refreshed daily at 12:00 AM, starting a new list for the new day.
- **Persistent Storage**: Tasks are stored on the server, and an ID is stored in localStorage to fetch the relevant list.

## Technologies Used

- **Frontend**:
  - HTML
  - CSS
  - JavaScript

- **Backend**:
  - PHP
  - REST API

## Project Structure

- **index.html**: The main HTML file for the application.
- **styles.css**: The CSS file for styling the application.
- **script.js**: The JavaScript file handling the frontend logic.
- **/todo**: Folder containing the REST API endpoints.

## API Endpoints

- **POST /todo/fetch:userId**: Fetch all tasks.
- **POST /api/tasks:userId,content**: Add a new task.
- **PUT /api/tasks/:contentId,userId**: Update a task (check/uncheck).
- **DELETE /api/tasks/:contentId,userId**: Delete a task.

## Usage

### Adding a Task

1. Type the task description in the input field.
2. Click the "Add" button or press "Enter".

### Deleting a Task

1. Click the "Delete" button next to the task you want to remove.

### Checking/Unchecking a Task

1. Click the checkbox next to the task to mark it as completed or incomplete.

### Daily Refresh

The list is automatically refreshed daily at 12:00 AM. A new list will be available for the new day.

## License

This project is licensed under the MIT License. See the [LICENSE](https://github.com/git/git-scm.com/blob/main/MIT-LICENSE.txt) file for details.

## Contact

For any questions or feedback, please contact [your-me@sujal.info](mailto:me@sujal.info).

## Live Demo

Check out the live demo of the project [here](https://todo.sujal.info).

---

Thank you for using the To-Do List Application! Happy task managing!
