# Project 03: WordPress + MySQL + Nginx

Production-ready WordPress deployment with Docker Compose, demonstrating the most in-demand containerization scenario on Fiverr.

## Architecture

```
Browser → Nginx (9090) → WordPress Apache (80) → MySQL (3306)
  Proxy      CMS + Web Server        Database
```

## Quick Start

```bash
git clone https://github.com/zeroxin2003/project-03-wordpress-docker.git
cd project-03-wordpress-docker
docker compose up -d

# Visit http://localhost:9090 and run the WordPress installer
```

## What's Included

| Component | Tech | Purpose |
|-----------|------|---------|
| Reverse Proxy | Nginx Alpine | Single entry point, SSL termination ready |
| CMS | WordPress 6 + PHP 8.2 | Content management system |
| Database | MySQL 8.0 | Persistent data storage |
| Orchestration | Docker Compose | Multi-container management |
| CI/CD | GitHub Actions | Auto build, test, deploy |

## Key Features

- **Health checks** on all 3 services with proper startup ordering
- **Persistent data** via named Docker volumes (`wp_data` + `db_data`)
- **Nginx reverse proxy** with 64M upload limit for WordPress media
- **Environment variables** for database credentials (no hardcoded secrets in code)
- **Alpine-based images** where possible for minimal footprint
- **SSL-ready** architecture — just add cert config to Nginx

## WordPress-Specific Notes

- First visit runs the WordPress installation wizard
- File uploads up to 64MB supported via Nginx config
- Plugin and theme installations persist across container restarts (stored in `wp_data` volume)

## Useful Commands

```bash
docker compose up -d            # Start all services
docker compose ps               # Check status and health
docker compose logs -f wordpress  # View WordPress logs
docker compose down             # Stop (data preserved)
docker compose down -v          # Stop and remove all data
```

## Project Structure

```
├── docker-compose.yml      # Multi-service orchestration
├── nginx/
│   └── default.conf        # Nginx reverse proxy config
├── .github/
│   └── workflows/
│       └── ci.yml          # CI/CD pipeline
└── .dockerignore
```
