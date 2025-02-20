// Times
const equipes = ["Palmeiras", "Santos", "São Paulo", "Corinthians", "Cruzeiro", "Atlético MG"]

// Pontuações iniciais
let scores = {
    "Palmeiras": 0,
    "Santos": 0,
    "São Paulo": 0,
    "Corinthians": 0,
    "Cruzeiro": 0,
    "Atlético MG": 0
}

// Função para simular o placar de uma partida 
function simulateMatch(team1, team2) {
    const score1 = Math.floor(Math.random() * 6)
    const score2 = Math.floor(Math.random() * 6)

    console.log(`${team1} ${score1} - ${score2} ${team2}`)

    if (score1 > score2) {
        scores[team1] += 3
    } else if (score1 < score2) {
        scores[team2] += 3
    } else {
        scores[team1] += 1
        scores[team2] += 1
    }
}

// Simular todas as partidas
for (let i = 0; i < equipes.length; i++) {
    for (let j = i + 1; j < equipes.length; j++) {
        simulateMatch(equipes[i], equipes[j])
    }
}

// Ordenar e exibir a tabela de pontuação
let sortedTeams = Object.keys(scores).sort((a, b) => scores[b] - scores[a])

console.log("\nTabela de Pontuação:")
sortedTeams.forEach(team => {
    console.log(`${team}: ${scores[team]} pontos`)
})
