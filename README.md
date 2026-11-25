# Group 5 | CS383
# Photography Studio Management System

A web-based photography studio management platform built with **Laravel** and a **microservices architecture**. The system allows clients to explore photography packages, choose photographers, book sessions, manage payments, and leave reviews after completed sessions.

**Course:** CS383 – Enterprise Web Application Development  
**Institution:** Yanbu Industrial College  
**Academic Year:** 2026–2027

---

## 📖 Project Overview

The Photography Studio Management System is designed to simplify the process of managing photography studio bookings and related activities.

Instead of handling appointments, photographer schedules, packages, payments, and customer reviews manually, the system provides an organized online platform where clients and studio staff can interact with the services efficiently.

The project follows a **microservices architecture**, dividing the system into four independent services. Each service is responsible for a specific business function, maintains its own database, and communicates with other services through REST APIs.

The system provides a responsive interface suitable for both desktop and mobile devices, with support for Arabic and English.

---

## 🎯 Project Objectives

- Allow clients to book photography sessions online.
- Display photography packages, prices, and session durations.
- Allow clients to select photographers and available appointment times.
- Help photographers manage their schedules and assigned sessions.
- Prevent scheduling conflicts and double bookings.
- Provide photographer profiles and client reviews.
- Manage payment records and payment statuses.
- Provide dashboard statistics and summaries.
- Implement secure authentication, role-based access control, and authorization.
- Support Arabic and English interfaces.
- Organize the application using independent microservices connected through APIs.

---

## 👥 Team Members & Services

Each team member is responsible for one main service. The services will be developed independently and integrated to form one complete system.

### 1. Booking & Packages Service

**Responsible:** Nada Aljarallh

**Purpose:** Manage photography packages and the booking process.

**Responsibilities:**
- Create, view, update, and cancel bookings.
- Display available dates and appointment time slots.
- Prevent booking conflicts and double bookings.
- Create, view, edit, and delete photography packages.
- Manage package names, descriptions, prices, and durations.
- Connect clients' bookings with selected packages and photographers.

**Example:** An administrator adds a Graduation Photography package. A client selects the package, chooses a photographer, and books an available date and time.

---

### 2. Authentication & Roles Service

**Responsible:** Layan Alharbi

**Purpose:** Handle user authentication, account access, roles, and permissions.

**Responsibilities:**
- Manage user registration.
- Handle login and logout.
- Assign and manage user roles:
  - Admin
  - Photographer
  - Client
- Check user permissions and restrict unauthorized access.
- Protect restricted pages and API endpoints.
- Provide basic user identity information to other services through an API.

**Example:** A client can log in and book photography sessions but cannot access administrator functions or manage other users.

---

### 3. User Profiles & Reviews Service

**Responsible:** Dana Aljehani

**Purpose:** Manage user profile information, photographer profiles, and client feedback.

**Responsibilities:**
- Create and manage the User Profile page displaying basic user details.
- Create and manage Photographer Profile pages.
- Display photographer information.
- Allow clients to submit ratings and comments after completed sessions.
- Display reviews and ratings on photographer profiles.

**Example:** A client visits a photographer's profile, views their information and previous reviews, and submits a rating and comment after completing a photography session.

---

### 4. Payments & Dashboard Service

**Responsible:** Jana Darandari

**Purpose:** Manage payment records and provide administrative statistics.

**Responsibilities:**
- Create and manage the Payment page.
- Record and display payment statuses.
- Display payment summaries using simple cards.
- Create dashboard cards and charts for packages and photographers.
- Display booking statistics, including:
  - Total bookings
  - Pending bookings
  - Completed bookings
- Provide summary information for administrators.

**Example:** An administrator views the dashboard to check booking statistics, payment statuses, the number of photography packages, and photographer-related information.

---

## 🧩 System Architecture

The system is divided into four independent services:

| Service | Main Responsibility | Database |
|---|---|---|
| Booking & Packages | Bookings, availability, and packages | Independent database |
| Authentication & Roles | Registration, login, roles, permissions, identity | Independent database |
| User Profiles & Reviews | User profiles, photographer profiles, reviews, ratings | Independent database |
| Payments & Dashboard | Payment records, statistics, and dashboard data | Independent database |

### Microservices Approach

Each service:

- Handles a specific business responsibility.
- Has its own database.
- Can be developed independently.
- Communicates with other services through REST APIs.
- Exposes the required data and functionality without directly accessing another service's database.

The services will be integrated to provide a unified experience through the main web application.

---

## 👤 User Roles

The system supports three main user roles.

### Admin
- Manage the overall system.
- Manage photography packages.
- Manage bookings.
- Manage payment records.
- Access dashboard statistics and reports.
- Perform administrative operations.

### Photographer
- View assigned photography sessions.
- Manage availability and schedules.
- Maintain photographer information and profile details.

### Client
- Browse photography packages.
- View photographer profiles.
- Book photography sessions.
- View their bookings.
- Submit ratings and comments after completed sessions.

Role permissions are enforced by the system to prevent users from accessing features they are not authorized to use.

---

## 📸 Photography Packages

Clients can browse different photography packages before making a booking.

Examples of proposed packages:

| Package | Description |
|---|---|
| Portrait Photography | Individual photography sessions |
| Family Photography | Photography sessions for families |
| Graduation Photography | Graduation sessions for students |
| Product Photography | Photography sessions for products |

Each package includes:

- Package name
- Description
- Price
- Session duration

Administrators can add, update, or delete packages as needed.

---

## 🔄 Main System Workflow

### 1. Account Access
The client registers or logs in through the Authentication & Roles Service.

### 2. Browse Packages
The client explores available photography packages and their details.

### 3. Choose a Photographer
The client views photographer information and selects a suitable photographer.

### 4. Select an Appointment
The client chooses an available date and time. The Booking & Packages Service checks availability and prevents scheduling conflicts.

### 5. Confirm Booking
The booking information is saved and associated with the selected client, photographer, and package.

### 6. Payment Record
The Payments & Dashboard Service records the payment information and its current status.

### 7. Complete the Session
After the photography session is completed, the client can access the photographer's profile.

### 8. Submit a Review
The client submits a rating and comment through the User Profiles & Reviews Service.

### 9. Dashboard Updates
The administrator can view updated booking and payment information and dashboard statistics.

---

## 📊 Dashboard Overview

The administrative dashboard is intended to provide a quick overview of the studio's activity.

It may include:

- **Most Booked Photographer:** Photographer with the highest number of bookings.
- **Most Popular Packages:** Photography packages with the highest booking counts.
- **Most Requested Times:** Appointment time slots with the highest demand.
- **Booking Summary:** Total, pending, and completed bookings.
- **Payment Overview:** Payment records and their statuses.

---

## 🛠️ Technology Stack

| Technology | Purpose |
|---|---|
| Laravel (PHP) | Backend development and service implementation |
| Blade | Server-side templates for web pages |
| HTML5 | Page structure |
| CSS3 | Styling and layout |
| Bootstrap | Responsive interface and UI components |
| JavaScript | Client-side interaction and dynamic behavior |
| MySQL | Database management; separate database per service |
| REST APIs | Communication and integration between services |
| Git & GitHub | Version control, collaboration, and project sharing |

---

## 🔐 Security & Access Control

Security is an important part of the system.

Planned security features include:

- User authentication.
- Role-based access control.
- Authorization checks for restricted operations.
- Protected pages and API endpoints.
- Input validation.
- Secure handling of user-submitted data.
- Prevention of unauthorized access to administrative functionality.

---

## 📱 User Interface

The application aims to provide a simple and user-friendly interface.

The interface will be:

- Responsive across desktop, tablet, and mobile devices.
- Organized and easy to navigate.
- Designed around the different user roles.
- Available in Arabic and English.
- Focused on making booking photography sessions straightforward.

---

## 🤝 Team Collaboration

Each team member is responsible for developing their assigned service and its database.

The team will work together on:

- Defining service interfaces and API endpoints.
- Integrating the four services.
- Testing API communication.
- Testing the complete booking workflow.
- Resolving integration issues.
- Ensuring consistency across the system.
- Preparing the final application and project deliverables.

---

## 🚀 Expected Outcome

The expected outcome is a functional Photography Studio Management System consisting of four connected services.

Clients will be able to explore packages, select photographers, book sessions, and review completed experiences. Photographers will be able to manage their schedules and view assigned sessions. Administrators will be able to manage the studio's operations, monitor payments, and view dashboard statistics.

By separating the system into microservices, the project demonstrates how a web application can be organized into independent business services that communicate through APIs while working together as one integrated platform.

---

## 📚 Course Context

This project is developed as part of **CS383 – Enterprise Web Application Development**, demonstrating concepts related to:

- Enterprise Web Application Architecture
- MVC Architecture
- Laravel Framework
- Microservices Architecture
- Web Services
- RESTful APIs
- Database Design
- Authentication & Authorization
- Responsive Web Development
- Team Collaboration and Integration

---

## 👩‍💻 Group 5

| Name | Service |
|---|---|
| Nada Aljarallh | Booking & Packages Service |
| Layan Alharbi | Authentication & Roles Service |
| Dana Aljehani | User Profiles & Reviews Service |
| Jana Darandari | Payments & Dashboard Service |

**Photography Studio Management System — Group 5, CS383**
