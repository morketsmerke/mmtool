#!/bin/bash

#repoSource="https://github.com/xf0r3m";

function lastCommitExistRepo() {
  cd /tmp/$1;
  git pull >> /dev/null 2>&1;
  git log --pretty=oneline | head -1;
}

function lastCommitNewRepo() {
  git clone ${repoSource}/$1 /tmp/$1 >> /dev/null 2>&1;
  cd /tmp/$1;
  git log --pretty=oneline | head -1;
}

for repo in $1; do
  if [ -d /tmp/$repo ]; then lcommit=$(lastCommitExistRepo $repo);
  else lcommit=$(lastCommitNewRepo $repo);
  fi
  commitID=$(echo $lcommit | cut -d " " -f 1);
  shortCommitID=$(echo $commitID | cut -c 34-41);
  commitMsg=$(echo $lcommit | cut -d " " -f 2-);
  commitLink="${repoSource}/${repo}/commit/${commitID}";
  echo -e "\t<li>${repo} - ${shortCommitID} - <a href=\"${commitLink}\">${commitMsg}</a></li>";
done
