# Password Generator API
- This is a simple API for generating random passwords. 
- The API has one endpoint "/generate_password" which accepts two parameters "length" and "include_symbols". 
- The output is returned as a JSON object containing the generated password.

# Requirements
- PHP 7.0 or higher
- Web server software (such as Apache or Nginx)

# Installing
- Clone or download the repository to your local machine.
- Place the contents of the repository in the document root directory of your web server.
- Make sure that the web server is configured to handle PHP files.

# Usage
- To use the API, make a GET request to the endpoint "/generate_password.php" with the following query parameters:
- "length": an integer representing the length of the generated password.
- "include_symbols": a boolean value indicating if the password should include symbols or not.


# Password Generator API - Developer Manual
- This developer manual provides information on how to use and customize the Password Generator API.

- The API has one endpoint:
-- "/generate_password"

# Input parameters
The API accepts the following query parameters:
- "length" - The length of generated password
- "include_symbols" - Indicates if the password should include symbols or not.

# Output
- The API returns a JSON object containing the generated password. 
- The JSON object has the following structure:
{
    "password": "generated_password"
}

# How it works
- The script generates a random password using the "length" and "include_symbols" parameters. The script uses the "rand()" function to generate a random index based on the length of the characters string and then it appends the character at that index to the password. It checks whether the "include_symbols" parameter is true or false and adds the symbols to the characters string if it's true.

# Customization
- Customizing the API
- There are a few ways you can customize the API to suit your needs:

- You can change the characters string to include or exclude certain characters.
- You can add more validation for the input parameters.
- You can implement a more secure method for generating random numbers.
- You can add more endpoints to generate different types of passwords.
- You can add more functionalities like password validation, password strength checker.
