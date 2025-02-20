# 26: Validação de CPF
**Objetivo:**
Criar um algoritmo que valide um CPF informado, verificando se é válido de acordo com os dígitos verificadores.

**Instruções:**
Crie uma função que receba uma string ou número representando o CPF (somente os dígitos).
Remova quaisquer caracteres que não sejam números.
Verifique se o CPF possui exatamente 11 dígitos.
Calcule os dígitos verificadores conforme a regra do CPF:
* Multiplique os dígitos pelos pesos correspondentes, some os resultados, e calcule o módulo 11.
* O primeiro dígito verificador será 11 − (soma módulo 11), ajustando para 0 se o resultado for maior que 9.
* Repita o processo para o segundo dígito verificador, considerando o primeiro dígito já calculado.
Compare os dígitos verificadores calculados com os fornecidos no CPF.
Retorne se o CPF é válido ou inválido.
**Restrições**
O CPF deve conter apenas números.
Desconsidere CPFs formados por dígitos repetidos (como "111.111.111-11").