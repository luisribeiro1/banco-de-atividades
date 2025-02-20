// Seleções participantes da Copa do Mundo de 2022
const teams = [
    "Catar", "Equador", "Holanda", "Senegal", "Estados Unidos",
    "Inglaterra", "Irã", "País de Gales", "Argentina", "Arábia Saudita",
    "México", "Polônia", "França", "Dinamarca", "Tunísia",
    "Austrália", "Espanha", "Alemanha", "Japão", "Costa Rica",
    "Bélgica", "Canadá", "Marrocos", "Croácia", "Brasil",
    "Sérvia", "Suíça", "Camarões", "Portugal", "Gana",
    "Uruguai", "Coreia do Sul"
];

// Função para criar grupos de 4 equipes
function createGroups(teams) {
    let groups = [];
    for (let i = 0; i < 8; i++) {
        groups.push(teams.slice(i * 4, i * 4 + 4));
    }
    return groups;
}

// Função para simular placar de uma partida
function simulateMatch(team1, team2) {
    const score1 = Math.floor(Math.random() * 6);
    const score2 = Math.floor(Math.random() * 6);

    return { team1, score1, team2, score2 };
}

// Função para exibir partidas de grupo
function displayGroupMatches(group, groupName) {
    console.log(`\n${groupName}:`);
    for (let i = 0; i < group.length; i++) {
        for (let j = i + 1; j < group.length; j++) {
            const match = simulateMatch(group[i], group[j]);
            console.log(`${match.team1} ${match.score1} - ${match.score2} ${match.team2}`);
        }
    }
}

// Função para simular jogos de grupo
function simulateGroupStage(groups) {
    let winners = [];
    groups.forEach((group, index) => {
        displayGroupMatches(group, `Grupo ${index + 1}`);
        group.sort(() => Math.random() - 0.5); // Ordenar aleatoriamente
        winners.push(group[0], group[1]); // Avançar os dois primeiros de cada grupo
    });
    return winners;
}

// Função para simular jogos eliminatórios
function simulateKnockoutStage(teams) {
    let round = 1;
    while (teams.length > 1) {

        switch (round) {
            case 1:
                console.log(`\nOitavas de Final:`);
                break;
            case 2:
                console.log(`\nQuartas de Final:`);
                break;
            case 3:
                console.log(`\nSemifinal:`);
                break;
            case 4:
                console.log(`\nFinal:`);
                break;
        }
        //console.log(`\nFase Eliminatória - Rodada ${round}:`);


        let nextRoundTeams = [];
        for (let i = 0; i < teams.length; i += 2) {
            const match = simulateMatch(teams[i], teams[i + 1]);
            console.log(`${match.team1} ${match.score1} - ${match.score2} ${match.team2}`);
            const winner = match.score1 > match.score2 ? match.team1 : match.team2;
            nextRoundTeams.push(winner);
        }
        teams = nextRoundTeams;
        round++;
    }
    return teams[0]; // Campeão
}

// Criar equipes e grupos
const groups = createGroups(teams);

// Simular fase de grupos
const winners = simulateGroupStage(groups);

// Simular fase eliminatória
const champion = simulateKnockoutStage(winners);

console.log(`\nO campeão da Copa do Mundo é: ${champion}`);
