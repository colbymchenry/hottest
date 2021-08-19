#!/usr/bin/env bash

#Must be installed on a LAMP server running Ubuntu under sudo

echo "UPDATING..."
apt-get update
echo "INSTALLING VSFTPD"
apt-get install vsftpd
cp /etc/vsftpd.conf /etc/vsftpd.conf.orig
echo "OPENING PORTS"
ufw allow 20/tcp
ufw allow 21/tcp
ufw allow 990/tcp
ufw allow 40000:50000/tcp
echo "ADDING DATAMASTER USER ACCOUNT"
adduser datamaster
echo "CREATING DATAMASTER DIRECTORIES"
mkdir /home/datamaster/ftp
chown datamaster:datamaster /home/datamaster/ftp
chmod a-w /home/datamaster/ftp
mkdir /home/datamaster/ftp/files
chown datamaster:datamaster /home/datamaster/ftp/files
mkdir /home/datamaster/ftp/files/images
chown datamaster:datamaster /home/datamaster/ftp/files/images
chmod 755 /home/datamaster/ftp/files/images
echo "UPDATING /etc/vsftpd.conf"
echo "anonymous_enable=NO" >> /etc/vsftpd.conf
echo "local_enable=YES" >> /etc/vsftpd.conf
echo "write_enable=YES" >> /etc/vsftpd.conf
echo "chroot_local_user=YES" >> /etc/vsftpd.conf
echo "user_sub_token=\$USER" >> /etc/vsftpd.conf
echo "local_root=/home/\$USER/ftp" >> /etc/vsftpd.conf
echo "pasv_min_port=40000" >> /etc/vsftpd.conf
echo "pasv_max_port=50000" >> /etc/vsftpd.conf
echo "userlist_enable=YES" >> /etc/vsftpd.conf
echo "userlist_file=/etc/vsftpd.userlist" >> /etc/vsftpd.conf
echo "userlist_deny=NO" >> /etc/vsftpd.conf
echo "datamaster" >> /etc/vsftpd.userlist
systemctl restart vsftpd
ln -s /home/datamaster/ftp/files/images /var/www/html && chmod -R g+w /var/www/html
ln -s /home/datamaster/ftp/files /var/www/html && chmod -R g+w /var/www/html
echo "DONE!"
echo "You now need to go edit apache2.conf and 000-default.conf yourself and replace the <Directory> with this:"
printf "<Directory />\nOptions Indexes FollowSymLinks Includes ExecCGI\nAllowOverride All\nRequire all granted\n</Directory>\n"
echo "Then restart the apache server with sudo 'service apache2 restart'"