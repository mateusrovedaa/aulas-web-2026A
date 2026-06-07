// Model: representa a entidade TimeFutebol — só dados, sem lógica de banco
class TimeFutebol {
    constructor(nome, fundacao, estadio, corPrincipal, id = null) {
        this.id           = id;
        this.nome         = nome;
        this.fundacao     = fundacao;
        this.estadio      = estadio;
        this.corPrincipal = corPrincipal;
    }

    // Converte para o formato JSON esperado pelo frontend
    toJSON() {
        return {
            id:            this.id,
            nome:          this.nome,
            fundacao:      this.fundacao,
            estadio:       this.estadio,
            cor_principal: this.corPrincipal,
        };
    }
}

module.exports = TimeFutebol;
