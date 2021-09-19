/// <reference types="cypress" />

describe("Testing Flick Yack Login", () => {
  beforeEach(() => {
    cy.visit("http://localhost:2431/flick-yak/");
  });

  it("Login and Clear session with Logout", () => {
    cy.login("cbaldry", "12345");
    cy.get("a").contains("Log Out").should("be.visible").click();
    cy.get("a").contains("Register").should("be.visible");
  });

  it("Login and admin links available", () => {
    cy.login("dbaldry", "qwert");
    cy.get("a").contains("Add Movie").should("be.visible");
    cy.get("a").contains("List All Users").should("be.visible");
    cy.get("a").contains("View All Movies").should("be.visible");
    cy.get("a").contains("Update My Profile").should("be.visible");
  });

  it("Login and member links available", () => {
    cy.login("lbaldry", "asdfg");
    cy.get("a").contains("Add Movie").should("not.exist");
    cy.get("a").contains("List All Users").should("not.exist");
    cy.get("a").contains("View All Movies").should("be.visible");
    cy.get("a").contains("Update My Profile").should("be.visible");
  });
});
