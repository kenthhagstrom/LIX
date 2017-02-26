# LIX - Läsbarhetsindex #
Swedish readability calculator based on [LIX](https://sv.wikipedia.org/wiki/L%C3%A4sbarhetsindex).

### Usage ###
```php
$text = 'your text here'; // The text you want to measure.
$lix = new LIX( $text ); // Make it happen.
echo $lix->val; // This will output your text readability score
```

## Score ##

| Score        | Type           |
| ------------- |-------------|
| 0-25      | Childrens book |
| 26-30      | Easy reading      |
| 31-40 | Normal text      |
| 41-50 | Factual text      |
| 51-60 | Advanced nonfiction      |
| 61-100 | Advanced, scientific |

## Contribute ##
Anyone is welcome to contribute to this script. There are various ways you can contribute:

- Raise an [Issue](https://github.com/kenthhagstrom/LIX/issues/)
- Send a Pull Request with your bug fixes and/or new features
- Provide feedback and suggestions