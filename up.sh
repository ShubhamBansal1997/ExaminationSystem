ssh neetgurumantra.com <<'ENDSSH'
cd /var/www/html/
sudo git fetch
sudo git rebase origin/master master
ENDSSH

