#!/bin/bash

n=0
cd /home/njiva/bash/

for i in $(seq 1 10);do 
  if [ ! -f /home/njiva/bash/backups\($i\).tar ];then
    n=$i 
    break;
  fi 
done

if [[ n == 0 ]];then
 n=11
fi
#echo "$n" > data/teste.txt

if [[ n -gt 0 ]]; then
  echo "Le nombre n = $n"

  if [[ n > 1 ]]; then
    for i in $(seq $n -1 2);do 
      mv backups\($((i-1))\).tar backups\($i\).tar  
    done
    mv backups.tar backups\(1\).tar
  fi

  tar -cvf backups.tar data/

else
  echo "Le nombre n est 11 : $n"
  
  for i in $(seq 10 -1 2);do 
    mv backups\($((i-1))\).tar backups\($i\).tar  
  done
  mv backups.tar backups\(1\).tar

  tar -cvf backups.tar data/
fi
