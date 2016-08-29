# paymentBundle
Please do not use this Bundle Yet. ^^ 

This Bundle is a test Bundle for CNC integration 

## How to install ?
### composer.json
Add this line : <br>
<code>"docroms/cnc-bundle": "dev-master",</code><br>
### config.json
Add this lines : <br>

<code>cnc:</code><br>
    &nbsp;&nbsp;&nbsp;&nbsp;<code>consumerKey: your-consumer-Key</code><br>
    &nbsp;&nbsp;&nbsp;&nbsp;<code>consumerSecret: your-consumer-secret</code><br>
    &nbsp;&nbsp;&nbsp;&nbsp;<code>accessToken: your-access-token</code><br>
    &nbsp;&nbsp;&nbsp;&nbsp;<code>accessTokenSecret : your-access-token-secret</code><br>
    
### AppKernel.php
Add this lines on the Bundles array: <br>
    <code>new \docroms\Bundle\CncBundle\CncBundle()</code>
    
    
## How to use it?
### On your controller : 
You can just initialize the payment like that : <br>
<code> $cnc = $this->get('cnc.cnc')</code><br>
    &nbsp;&nbsp;&nbsp;&nbsp;<code>->init()</code><br>
    &nbsp;&nbsp;&nbsp;&nbsp;<code>->auth();</code><br>


