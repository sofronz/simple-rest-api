
# Simple REST API - User Management

This project is a simple REST API built with **Laravel** to manage user data. It provides basic operations such as listing, creating, updating, and deleting users.

For detailed API documentation, please refer to the [API Documentation](https://documenter.getpostman.com/view/10125362/2sAYXFhxL9#intro).

## Features

- **Create User**: Add a new user to the database.
- **List Users**: Retrieve a list of all users.
- **Find User**: Search for a user by a specific key (e.g., id).
- **Update User**: Modify an existing user's details.
- **Delete User**: Remove a user from the database.

## Requirements

- PHP >= 8.3
- Composer
- Laravel 11.x or higher
- MySQL or any other database supported by Laravel

## Installation

Follow these steps to set up the project locally:

### 1. Clone the Repository

```bash
git clone https://github.com/sofronz/simple-rest-api.git
```

### 2. Install Dependencies

Navigate to the project directory and run:

```bash
cd repository-name
composer install
```

### 3. Set Up Environment File

Copy the example environment file and edit the database settings:

```bash
cp .env.example .env
```

Edit the `.env` file and configure your database settings, like:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

### 4. Generate Application Key

Run the following command to generate the application key:

```bash
php artisan key:generate
```

### 5. Run Migrations & Seeder

Run the migrations to set up your database, then use the seeder to populate it with dummy data.

```bash
php artisan migrate --seed
```

### 6. Serve the Application

Start the Laravel development server:

```bash
php artisan serve
```

The API will be available at `http://localhost:8000`.

## Usage

The available endpoints for this API are:

- `GET /api/users` - Retrieve all users.
- `GET /api/users/{id}` - Retrieve a user by ID.
- `POST /api/users` - Create a new user.
- `PUT /api/users/{id}` - Update a user's data.
- `DELETE /api/users/{id}` - Delete a user.

## Example Requests

### Create a User

Using **Jest** with **supertest** for testing API requests:

```javascript
const request = require('supertest');
const app = require('../app'); // path to your Express app

test('Create a new user', async () => {
  const response = await request(app)
    .post('/api/users')
    .send({
      name: 'John Doe',
      email: 'john.doe@example.com',
      age: '24'
    })
    .set('Accept', 'application/json');
  
  expect(response.status).toBe(201); // Check if user is created successfully
  expect(response.body.name).toBe('John Doe');
});
```

### Get List of Users

```javascript
test('Get all users', async () => {
  const response = await request(app)
    .get('/api/users')
    .set('Accept', 'application/json');
  
  expect(response.status).toBe(200);
  expect(Array.isArray(response.body)).toBe(true);
});
```

### Update a User

```javascript
test('Update a user', async () => {
  const response = await request(app)
    .put('/api/users/1') // Replace with a valid user ID
    .send({
      name: 'John Doe Updated',
      email: 'john.doe.updated@example.com'
    })
    .set('Accept', 'application/json');
  
  expect(response.status).toBe(200);
  expect(response.body.name).toBe('John Doe Updated');
});
```

### Delete a User

```javascript
test('Delete a user', async () => {
  const response = await request(app)
    .delete('/api/users/1') // Replace with a valid user ID
    .set('Accept', 'application/json');
  
  expect(response.status).toBe(200);
  expect(response.body.message).toBe('User deleted successfully');
});
```

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
