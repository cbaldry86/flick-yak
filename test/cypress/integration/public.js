/// <reference types="cypress" />

describe("Testing Flick Yack Public", () => {
  beforeEach(() => {
    cy.visit("http://localhost:2431/flick-yak/");
  });

  it("Check public features are there", () => {
    cy.get("a").contains("Add Movie").should("not.exist");
    cy.get("a").contains("List All Users").should("not.exist");
    cy.get("a").contains("Update My Profile").should("not.exist");
    cy.get("a").contains("View All Movies").should("be.visible");
    cy.get("input[name='search_movies']").should("be.visible");
    cy.get(".register-message").should("be.visible");
  });

  it("View All movies", () => {
    cy.get("a").contains("View All Movies").should("be.visible").click();
    cy.get("a").contains("delete").should("not.exist");
    cy.get("a").contains("Cars 2 (2011)").should("be.visible");
    cy.get("a").contains("Luca (2021)").should("be.visible");
    cy.get("a").contains("The Lion king (1994)").should("be.visible");
    cy.get("a").contains("Toy Story 4 (2019)").should("be.visible");

    cy.get("a").contains("Cars 2 (2011)").click();
    cy.get("p").contains("Average Rating: 5.4").should("be.visible");
    cy.get(".about-table").should("be.visible");
    cy.get(".chat-table").should("be.visible");
    cy.get("form[name='rating']").should("not.exist");
    cy.get("a").contains("(dbaldry)").should("not.exist");
    cy.get("form[name='discussion']").should("not.exist");
  });

  it("Check public features search", () => {
    cy.get("input[name='search_movies']").type("cars");
    cy.get("input[value='Search']").click();
    cy.get("a").contains("Cars 2 (2011)").should("be.visible");
    cy.get("a").contains("delete").should("not.exist");
  });
});
