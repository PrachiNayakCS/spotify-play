# Spotify API play

## Find out the audio features for a given CSV of Spotify track IDs:

```
docker run -p 80:80 -e SPOTIFY_TRACKID_CSV='trackid1,trackid2' -e SPOTIFY_CLIENT_ID='your-spotify-client-id' -e SPOTIFY_CLIENT_SECRET='your-spotify-client-secret' prachinayakcs/spotify:latest
```

Once the docker container is running, go to `http://localhost/spotify.php` on a browser.

----


# Docker build
> docker build -t my-php-app .

# Docker run (local)
> docker run -p 80:80 -e SPOTIFY_TRACKID_CSV='' -e SPOTIFY_CLIENT_ID='' -e SPOTIFY_CLIENT_SECRET='' my-php-app:latest

# Docker push to DockerHub
> docker tag my-php-app:latest prachinayakcs/spotify:latest
> docker push prachinayakcs/spotify:latest

# Docker run (public)
> docker run -p 80:80 -e SPOTIFY_TRACKID_CSV='' -e SPOTIFY_CLIENT_ID='' -e SPOTIFY_CLIENT_SECRET='' prachinayakcs/spotify:latest
