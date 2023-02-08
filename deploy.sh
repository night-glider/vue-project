#!/usr/bin/env sh

# abort on errors
#set -e

# build
npm run build

# navigate into the build output directory
#cd dist
cd dist2

# if you are deploying to a custom domain
# echo 'www.example.com' > CNAME

git init
git add -A
git commit -m 'deploy'
git push -f git@github.com/night-glider/vue-project-prod main:gh-pages

cd -

ftp