Feature: Create a new user
  In order to have new users on the platform
  As a user with admin permissions
  I want to create a new user

  Scenario: A valid non existing user
    Given I send a PUT request to "/users/98aa6782-e59a-4549-92cc-20c67121f47c" with body:
    """
    {
      "name": "John",
      "email": "johnlemon@email.com"
    }
    """
    Then the response status code should be 201
    And the response should be empty
