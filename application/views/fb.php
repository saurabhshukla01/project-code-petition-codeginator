<div id="fb_div">
    <h3>Post to your Facebook wall:</h3> <br />
    <textarea id="fb_message" name="fb_message" cols="70" rows="7"></textarea> <br />
    <input type="button" value="Post on Wall" onClick="post_on_wall();" />
</div>

<script type="text/javascript">
	(function() {
	    var e = document.createElement('script');
	    // replacing with an older version until FB fixes the cancel-login bug
	    e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
	    //e.src = 'scripts/all.js';
	    e.async = true;
	    document.getElementById('fb-root').appendChild(e);
	}());

	window.fbAsyncInit = function()
	{
	    FB.init({
	        appId  : 'xxxxxxxxxxxxxxx',
	        status : true, // check login status
	        cookie : true, // enable cookies to allow the server to access the session
	        xfbml  : true , // parse XFBML
	        oauth : true // Enable oauth authentication
	    });
	 
	 
	};
	 
	function post_on_wall()
	{
	    FB.login(function(response)
	    {
	        if (response.authResponse)
	        {
	            alert('Logged in!');
	 
	            // Post message to your wall
	 
	            var opts = {
	                message : document.getElementById('fb_message').value,
	                name : 'Post Title',
	                link : 'www.postlink.com',
	                description : 'post description',
	                picture : 'http://2.gravatar.com/avatar/8a13ef9d2ad87de23c6962b216f8e9f4?s=128&amp;amp;d=mm&amp;amp;r=G'
	            };
	 
	            FB.api('/me/feed', 'post', opts, function(response)
	            {
	                if (!response || response.error)
	                {
	                    alert('Posting error occured');
	                }
	                else
	                {
	                    alert('Success - Post ID: ' + response.id);
	                }
	            });
	        }
	        else
	        {
	            alert('Not logged in');
	        }
	    }, { scope : 'publish_stream' });
	}
</script>
<div id="fb-root"></div>

