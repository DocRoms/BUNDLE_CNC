# cncBundle

This Bundle help developers for integrate their movies to CNC. 

## How to install ?
### composer.json
Add this line : <br>
<code>"docroms/cnc-bundle": "dev-master",</code><br>
### config.json
Add this lines : <br>
<code>cnc:</code><br>
    &nbsp;&nbsp;&nbsp;&nbsp;<code>mode: recette # or production</code><br>
    &nbsp;&nbsp;&nbsp;&nbsp;<code>production_oauth_url: http://vad.cnc.fr</code><br>
    &nbsp;&nbsp;&nbsp;&nbsp;<code>production_consumer_key: YourProductionConsumerKey</code><br>
    &nbsp;&nbsp;&nbsp;&nbsp;<code>production_consumer_secret: YourProductionConsumerSecret</code><br>
    &nbsp;&nbsp;&nbsp;&nbsp;<code>production_access_token: YourProductionAccessToken</code><br>
    &nbsp;&nbsp;&nbsp;&nbsp;<code>production_access_token_secret : YourProductionAccessTokenSecret</code><br>
    &nbsp;&nbsp;&nbsp;&nbsp;<code>recette_oauth_url:  http://int-cncvod.integra.fr</code><br>
    &nbsp;&nbsp;&nbsp;&nbsp;<code>recette_consumer_key: YourRecetteConsumerKey</code><br>
    &nbsp;&nbsp;&nbsp;&nbsp;<code>recette_consumer_secret: YourRecetteConsumerSecret</code><br>
    &nbsp;&nbsp;&nbsp;&nbsp;<code>recette_access_token: YourRecetteAccessToken</code><br>
    &nbsp;&nbsp;&nbsp;&nbsp;<code>recette_access_token_secret : YourRecetteAccessTokenSecret</code><br>

### AppKernel.php
Add this lines on the Bundles array: <br>
    <code>new \docroms\CncBundle\CncBundle()</code>
    
## How to use it?
### On your controller : 
You can just get the object (for send all movies to the CNC) like that : <br>
    &nbsp;&nbsp;&nbsp;&nbsp;<code>$editor = $this->get('cnc')</code><br>
    &nbsp;&nbsp;&nbsp;&nbsp;<code>->getNewOeuvresByEditor();</code><br>
	<br><br>
And send this object like this for send your movie list to the CNC: <br>
    &nbsp;&nbsp;&nbsp;&nbsp;<code>$result = $this->get('cnc')</code><br>
	&nbsp;&nbsp;&nbsp;&nbsp;<code>->SendToCnc($editor);</code><br>
	<br><br>
After, you can get your movie list FROM the CNC like that: <br>
    &nbsp;&nbsp;&nbsp;&nbsp;<code>$result = $this->get('cnc')</code><br>
	&nbsp;&nbsp;&nbsp;&nbsp;<code>->GetFromCnc($editor);</code><br>