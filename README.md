Project rapidAVD

Product Requirements Document (PRD) (Software requirements specification (SRS))

1. Basic Users accounts
2. Dashboard to avail all info
3. Features to be accessible by 
   a.  public API with auth-token
   b.  from User's dashboard
   

List of features :
a. Download Video
b. Extract and download audio from video


API's exposed : 
1. /getvideo
2. /getaudio
3. /getinfo


APIs Description : 


 /getvideo

Request Format : 

POST Request to : 
    http://<username>:<auth-token>@vimmey.com/rapidavd/getvideo


   #<post-params>

      {
      "url":"https://www.youtube.com/watch?v=1qQaWviQ9gQ"
      }

Response Format : 

      {
      "requestId":"56534",
             "requestType":"audio|video",
      "url":"https://www.youtube.com/watch?v=1qQaWviQ9gQ",
      "downloadLink":"25000.00"
      }



 /getaudio

Request Format : 

   POST Request to : 
      http://<username>:<auth-token>@vimmey.com/rapidavd/getaudio


   #<post-params>

      {
      "url":"https://www.youtube.com/watch?v=1qQaWviQ9gQ"
      }

Response Format : 

      {
      "requestId":"56534",
                    "requestType":"audio|video",
      "url":"https://www.youtube.com/watch?v=1qQaWviQ9gQ",
      "downloadLink":""http://www.vimmey.com/rapidavd/downloads/QaWviQ9gQ.mp3"
      }



 /getinfo

Request Format : 

   POST Request to : 
     http://<username>:<auth-token>@vimmey.com/rapidavd/getinfo


   #<post-params>

      {
      "requestId":"56534"
      }

Response Format : 

      {
      "requestId":"56534",
      "requestType":"audio|video",
      "url":"https://www.youtube.com/watch?v=1qQaWviQ9gQ",
      "downloadLink":"25000.00"
      }