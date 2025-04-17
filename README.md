[![My check](https://github.com/KuzinaRuslana/Tree/actions/workflows/my-check.yml/badge.svg)](https://github.com/KuzinaRuslana/Tree/actions/workflows/my-check.yml)

### Requirements
+ PHP version >= 8.2
+ Laravel >= 12.0
+ Composer
+ SQLite

### How to use
1. Clone and install the project:
```bash
git clone https://github.com/KuzinaRuslana/Tree.git
cd Tree
make install
```
2. Create .env file:
```bash
cp .env.example .env
```
3. Open .env and make sure there is a line:
```env
DB_CONNECTION=sqlite
```
4. Create your .sqlite file:
```bash
touch database/database.sqlite
```
5. Prepare your database using migrations and seeds:
```bash
make prepare
```
6. Run the project:
```bash
make start
```
The project wiil be available on http://localhost:8000.
