# Implementação em PHP pata a biblioteca https://github.com/theuves/piii.js

# Piii.PHP

> Extrair, substituir ou verificar se há, palavrões em uma *string*.

## Instalação

APenas baixe e salve em sua aplicação o arquivo piii.php

## Uso

```php
Piii::extrair($str) // array("palavrão", "palavrinha");
Piii::substituir($str, $secureStr = "[censurado]") // "String com Palavrão" -> "String com [censurado]"
Piii::verificar($str) // true(contem palavrões) | false
```

 - `Piii::extrair`    - extrair todos os palavrões de uma *string*
 - `Piii::substituir` - substituir todos os palavrões por outra palavra
 - `Piii::verificar`  - verificar se há palavrões em uma *string*

Veja alguns exemplos abaixo:

```php
Piii::extrair('Foda-se essa porra!'); // array('Foda-se', 'porra')
Piii::substituir('Que porra!', '(piii)'); // 'Que (piii)!'
Piii::verificar('Filho de uma Puta!'); // true
```

Palavrões com letras repetidas ou com números, também são filtrados, veja:

```php
Piii::verificar('Caralhooooo!'); // true
Piii::verificar('Que p0rr4 é essa?'); // true
```

## Licença

[MIT](http://theuves.mit-license.org/) &copy; [Marcio Antunes](https://twitter.com/cgslivre)
