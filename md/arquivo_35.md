# 35: Campeonato Brasileiro
**Objetivo:**
Criar um algoritmo para simular uma tabela de jogos e pontuação similar ao Campeonato Brasileiro de futebol.

**Regra**
Deverá existir um número X de equipes que jogarão entre si. 
Cada partida terminará com um placar que pode ir de 0 a 5 de cada lado. O vencedor acumula 3 pontos, o perdedor não acumula nada e em caso de empate, cada equipe receberá 1 ponto. 
Deverá ser mostrado todas as partidas com o respectivo resultado. 
Ao Final, mostrar também uma tabela com a pontuação de cada equipe, ordenando da maior pontuação para a menor.

**Instruções:**

Crie um array com a lista das equipes participantes
Crie outro array ou objeto para armazenar a tabela de pontos. Inicialmente todas as equipes tem 0 pontos.
Crie uma função para simular as partidas. Esta função deverá receber dois parâmetros: equipe 1 e equipe 2.
Na função gere números aleatórios entre 0 e 5 para cada equipe. Guarde os resultados em duas variáveis.
Compare os placares gerados e atualize a tabela de pontos:
* Se a pontuação da equipe 1 for maior que a da equipe 2, equipe 1 ganha 3 pontos.
* Se a pontuação da equipe 2 for maior que a da equipe 1, equipe 2 ganha 3 pontos.
* Se as pontuações forem iguais, ambas as equipes ganham 1 ponto.
Exiba a partida da seuinte forma: `Equipe A 3 x 1 Equipe B` 
Simule todas as combinações possíveis de jogos - Utilize dois laços for para garantir que cada equipe jogue contra todas as outras equipes.
Use dois laços FOR para percorrer a lista das equipes e assim garantir que todos joguem contra todos. Dentro do FOR mais interno, chame a função para simular as partidas e passe o nome das duas equipes como parâmetros.
Ordene as equipes pela pontuação - Utilize a função de ordenação para ordenar o objeto ou o array de pontuações em ordem decrescente.
Exiba a tabela de pontuação - Mostre o resultado final das pontuações ordenadas para cada equipe.

**Restrições**
Monte a lista de equipes com número par

**Resultado esperado**
<img src="md/imagens/35-campeonato-brasileiro.png">