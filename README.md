# Omnipay: Solana gateway
[Solscan.io](https://public-api.solscan.io/docs/) driver for the [Omnipay](https://omnipay.thephpleague.com) PHP payment processing library.

## Installation
```
composer require financialplugins/omnipay-solana
```
## Usage
### Initialize
This step is required before using other methods.
```
$gateway = Omnipay::create('Solana');
   
$gateway->initialize();
```


### Fetch Transaction

To fetch transaction details pass the transaction signature. Example: 

```
$response = $gateway->fetchTransaction(['transactionReference' => '5vF7STm7q1v84THiJhL6BdvvYs9u2YvjwX5MjSmqJVdmu4x5SKsrc1QXveZREA7TaCnvrU96Ndc9Uxn3rVwwoemD'])->send();

if ($response->isSuccessful()) {
    $data = $response->getData();
} else {
    $errorMessage = $response->getMessage();
}
```

## Support
If you are having general issues with Omnipay, we suggest posting on [Stack Overflow](http://stackoverflow.com/). Be sure to add the [omnipay](omnipay) tag so it can be easily found.

If you want to keep up to date with release anouncements, discuss ideas for the project, or ask more detailed questions, there is also a [mailing list](https://groups.google.com/forum/#!forum/omnipay) which you can subscribe to.

If you believe you have found a bug, please report it using the [GitHub issue tracker](https://github.com/financialplugins/omnipay-solana/issues), or better yet, fork the library and submit a pull request.
