Cypress.Commands.add('login', (email, password) => {
    cy.get(".sign-in-button").click();
    cy.get('input[name="username_login"]').type(email);
    cy.get('input[name="pass_login"]').type(password);
    cy.get('input[name="login_submit"]').click();    
});