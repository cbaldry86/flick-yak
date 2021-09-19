/// <reference types="cypress" />

describe("Testing Flick Yack Registration", () => {
  beforeEach(() => {
    cy.visit(
      "http://localhost:2431/flick-yak/views/public/member_register.php"
    );
  });

  it("Register valid User", () => {
    cy.get("input[name='username']").type("testuser");
    cy.get("input[name='pass']").type("12345");
    cy.get("input[name='confirm_pass']").type("12345");
    cy.get("input[name='real_name']").type("test user");
    cy.get("input[name='email']").type("test.user@nowhere.com");
    cy.get("input[name='dob']").type("1987-02-18");
    cy.get("input[name='submit']").click();
    cy.get("h3").contains("Form Submitted successfully!").should("be.visible");
  });
});
