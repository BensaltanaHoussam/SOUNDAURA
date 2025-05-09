# SOUNDAURA 🎵


**SOUNDAURA** is an immersive music platform allowing artists to publish their creations (singles, albums) and users to discover, listen, and interact with a rich music library. The platform fosters community engagement while valuing musical creativity.

---

## Table of Contents

- [About The Project](#about-the-project)
- [Features](#-features)
- [Getting Started](#-getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
- [Usage](#-usage)
- [Contact](#-contact)

---

## About The Project

SOUNDAURA aims to provide a seamless experience for both music creators and listeners. Artists can easily upload and manage their music, while listeners can explore diverse genres, create playlists, and connect with their favorite artists.

---

## ✨ Features

*   **User Roles:** Custom accounts for Listeners and Artists.
*   **Music Streaming:** Listen to tracks directly on the platform.
*   **Playlist Management:** Create, edit personal playlists.
*   **Track Interaction:** Like tracks and comment on albums.
*   **Artist Following:** Follow favorite artists to stay updated.
*   **Music Upload:** Artists can upload singles and albums.
*   **Artist Dashboard:** View track statistics and manage uploads.
*   **Admin Panel:** Back office for platform moderation and management.
*   **Aura System:** Points system rewarding artist activity and engagement.

---

## 🗂️ User Stories

Les user stories détaillées pour chaque rôle sont disponibles ici : [https://docs.google.com/document/d/1iuvaeZ1yjBmQaB-fJHp3VoixRnUXllthFvSXayShgFQ/edit?usp=sharing](https://docs.google.com/document/d/1iuvaeZ1yjBmQaB-fJHp3VoixRnUXllthFvSXayShgFQ/edit?usp=sharing)

---

## 🚀 Getting Started

Follow these instructions to set up the project locally.

### Prerequisites

*   PHP >= 8.1 (Check `composer.json` for the exact version)
*   Composer
*   A database server (e.g., MySQL, PostgreSQL)
*   A web server (Optional, Laravel includes `artisan serve`. Laragon/XAMPP/WAMP work too)

### Installation

1.  **Clone the repository:**
    ```bash
    git clone https://github.com/BensaltanaHoussam/SOUNDAURA.git
    cd soundaura
    ```

2.  **Install PHP dependencies:**
    ```bash
    composer install
    ```

3.  **Install Node.js dependencies:**
    ```bash
    npm install
    ```

4.  **Set up environment variables:**
    *   Copy the example environment file:
        ```bash
        cp .env.example .env
        ```
    *   Edit the `.env` file and configure your database connection (`DB_*` variables), app URL (`APP_URL`), and any other necessary settings (mail, etc.).


5.  **Link storage directory:**
    ```bash
    php artisan storage:link
    ```

## 💻 Usage

Start the Laravel development server:

```bash
php artisan serve
```

Access the application in your browser, typically at `http://127.0.0.1:8000` or the `APP_URL` you configured.

---


## 📬 Contact

Project Maintainer: Houssam Bensaltana - `bensaltanahoussam7@gmail.com`

Project Link: [https://github.com/BensaltanaHoussam/SOUNDAURA.git](https://github.com/BensaltanaHoussam/SOUNDAURA.git)


