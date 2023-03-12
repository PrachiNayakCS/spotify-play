# Spotify API play

## Find out the audio features for a given CSV of Spotify track IDs:

1. pull the docker image from dockerhub
docker pull prachinayakcs/spotify

2. create an app on spotify developer dashboard  to generate a client ID and client secret 
https://developer.spotify.com/dashboard/applications

3. go to spotify's developer console and in the left menu select search and get the track ids of any artist you want(in q* specify 'artist:name' and type* specify'track')


```
docker run -p 80:80 -e SPOTIFY_TRACKID_CSV='trackid1,trackid2' -e SPOTIFY_CLIENT_ID='your-spotify-client-id' -e SPOTIFY_CLIENT_SECRET='your-spotify-client-secret' prachinayakcs/spotify:latest
```

Once the docker container is running, go to `http://localhost/spotify.php` on a browser.


## DockerHub
DockerHub link: https://hub.docker.com/r/prachinayakcs/spotify

----


## Docker build
> docker build -t my-php-app .

## Docker run (local)
> docker run -p 80:80 -e SPOTIFY_TRACKID_CSV='' -e SPOTIFY_CLIENT_ID='' -e SPOTIFY_CLIENT_SECRET='' my-php-app:latest

## Docker push to DockerHub
> docker tag my-php-app:latest prachinayakcs/spotify:latest
> docker push prachinayakcs/spotify:latest

## Docker run (public)
> docker run -p 80:80 -e SPOTIFY_TRACKID_CSV='' -e SPOTIFY_CLIENT_ID='' -e SPOTIFY_CLIENT_SECRET='' prachinayakcs/spotify:latest
