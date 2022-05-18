describe('Cadastro Notebook', () => {
    beforeEach(() => cy.visit('http://localhost/cadastro-notebooks/index/'));
    it.only('preencher formulario e submeter', () => {
        cy.get('#modelo').type("Super Turbo");
        cy.get('#marca').type("Lenovo");
        cy.get('#valor').type("24000");
        cy.get('#salvar > .btn').click();
    });

    it('', () => {

    });

    it('', () => {

    });
});