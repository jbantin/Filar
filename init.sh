# Navigate to your project directory
cd /home/sackler/Desktop/projects/php/Filar

# Make the database directory and file writable
chmod 664 database/database.sqlite
chmod 775 database/

# Also ensure the web server can write to storage and bootstrap/cache
chmod -R 775 storage/
chmod -R 775 bootstrap/cache/

# Make sure you own the files
sudo chown -R $USER:$USER database/
sudo chown -R $USER:$USER storage/
sudo chown -R $USER:$USER bootstrap/cache/