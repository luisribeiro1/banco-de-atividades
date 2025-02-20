# 36: Copa do Mundo de Futebol
**Objetivo:**
Criar um algoritmo para simular uma edição da Copa do Mundo de futebol, com a criação dos grupos, partidas, fases eliminatória e a definição do campeão.

**Instruções:**

**Passo 1: Definir as Seleções**
Crie uma lista com os nomes das seleções que participaram da Copa do Mundo de 2022.
* Utilize um array para armazenar os nomes das 32 seleções.

**Passo 2: Criar Grupos**

Divida as seleções em 8 grupos de 4 equipes cada.
* Implemente uma função que utilize a lista de seleções e crie grupos de maneira organizada.

**Passo 3: Simular Partidas**

Crie uma função para simular o placar de uma partida.
* A função deve gerar dois números aleatórios entre 0 e 5, representando os gols de cada equipe.
* A função deve retornar um objeto contendo os nomes das equipes e os respectivos placares.

**Passo 4: Exibir Partidas de Grupo**

Desenvolva uma função para exibir todas as partidas de um grupo específico.
* A função deve iterar sobre todas as combinações de partidas dentro do grupo, chamando a função de simulação de partidas para cada combinação.
* Exiba os resultados das partidas no formato "Equipe A X - Y Equipe B".

**Passo 5: Simular a Fase de Grupos**

Implemente uma função para simular a fase de grupos.
* Para cada grupo, chame a função de exibição de partidas.
* Armazene os dois melhores times de cada grupo, que avançarão para a fase eliminatória.

**Passo 6: Simular a Fase Eliminatória**

Crie uma função para simular a fase eliminatória.
* Utilize uma estrutura de laço (loop) para organizar as partidas de oitavas de final, quartas de final, semifinais e final.
* Para cada rodada, simule as partidas entre as equipes e avance os vencedores para a próxima rodada.

**Passo 7: Exibir Campeão**

No final, exiba a equipe campeã da Copa do Mundo.
* A última equipe restante após todas as rodadas eliminatórias é declarada campeã.


**Resultado esperado**
<img src="md/imagens/36-copa-do-mundo-1.png">
<img src="md/imagens/36-copa-do-mundo-2.png">
<img src="md/imagens/36-copa-do-mundo-3.png">