/// <reference types="cypress" />

describe("Testing Flick Yack Access 401", () => {
  it("Visit pages without login", () => {
    cy.visit(
      "http://localhost:2431/flick-yak/views/member/user_profile.php?id=1"
    );
    cy.get("h1").contains("401 Unauthorized").should("be.visible");
    cy.visit(
      "http://localhost:2431/flick-yak/views/member/update_member_profile.php?id=1"
    );
    cy.get("h1").contains("401 Unauthorized").should("be.visible");
    cy.visit(
      "http://localhost:2431/flick-yak/views/member/update_member_profile_h.php?id=1"
    );
    cy.get("h1").contains("401 Unauthorized").should("be.visible");
    cy.visit("http://localhost:2431/flick-yak/views/admin/add_movie.php");
    cy.get("h1").contains("401 Unauthorized").should("be.visible");
    cy.visit("http://localhost:2431/flick-yak/views/admin/all_users.php");
    cy.get("h1").contains("401 Unauthorized").should("be.visible");
    cy.visit("http://localhost:2431/flick-yak/views/admin/new_movie.php");
    cy.get("h1").contains("401 Unauthorized").should("be.visible");
    cy.visit(
      "http://localhost:2431/flick-yak/views/admin/delete_movie.php?id=1"
    );
    cy.get("h1").contains("401 Unauthorized").should("be.visible");
  });
});

describe("Testing Flick Yack Access 404", () => {
  it("Visit Admin pages without login", () => {
    cy.visit("http://localhost:2431/flick-yak/views/forms/login_form.php");
    cy.get("h1").contains("404 Not Found").should("be.visible");
    cy.visit("http://localhost:2431/flick-yak/views/common/nav.php");
    cy.get("h1").contains("404 Not Found").should("be.visible");
  });
});

describe("Testing 401 with member", () => {
  it("Visit Admin page as a member", () => {
    cy.login("mbaldry", "123ab");
    cy.visit("http://localhost:2431/flick-yak/views/admin/add_movie.php");
    cy.get("h1").contains("401 Unauthorized").should("be.visible");
    cy.visit("http://localhost:2431/flick-yak/views/admin/all_users.php");
    cy.get("h1").contains("401 Unauthorized").should("be.visible");
    cy.visit("http://localhost:2431/flick-yak/views/admin/new_movie.php");
    cy.get("h1").contains("401 Unauthorized").should("be.visible");
    cy.visit(
      "http://localhost:2431/flick-yak/views/admin/delete_movie.php?id=1"
    );
    cy.get("h1").contains("401 Unauthorized").should("be.visible");
  });
});
