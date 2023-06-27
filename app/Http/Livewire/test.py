import mysql.connector
import numpy as np
import statsmodels.api as sm
import statsmodels.api as sm

from sklearn.linear_model import LinearRegression
from scipy.stats import t

# Establish a connection to the MySQL database
connection = mysql.connector.connect(
    host='localhost',
    user='root',
    password='',
    database='energyin_myesco'
)

cursor = connection.cursor()
# Execute an SQL query to fetch data
query = "SELECT * FROM pwr_datas_end where userId=1"
cursor.execute(query)

# Fetch all the rows from the query result
rows = cursor.fetchall()

# Create an array to store the results
y = []
x = []


# Process the rows and populate the array
for row in rows:
    y.append(row[13])
    x.append([row[8]])
# print(y,x)
# Sample input features (x) and target values (y)
# x = np.array([[100], [150], [200], [250], [300]])  # Energy usage features (e.g., area in square meters)
# y = np.array([50, 60, 75, 85, 95])  # Energy consumption values (e.g., kilowatt-hours)

# # Create a linear regression model
model = LinearRegression()

# # Train the model
model.fit(x, y)

# # Get the coefficients and intercept of the linear regression equation
coefficients = model.coef_

residuals = y - model.predict(x)

# Convert x to a NumPy array
x = np.array(x)

# Calculate the standard error of the coefficients
n_samples = len(x)
mse = np.mean(residuals ** 2)
variance = mse * np.linalg.inv(np.dot(x.T, x)).diagonal()
std_errors = np.sqrt(variance / n_samples)

# Calculate the t-statistic for the coefficients
t_statistic = coefficients / std_errors

# Calculate the p-values for the t-statistics

print("T-statistic:", t_statistic)
intercept = model.intercept_
# Calculate R-squared
r_squared = model.score(x, y)

print("R-squared:{:.2f}". format(r_squared))
# # Print the equation of the linear regression line
print("Linear regression equation: y = {:.2f}x + {:.2f}".format(coefficients[0], intercept))
x = sm.add_constant(x)

# Create a linear regression model using statsmodels
model = sm.OLS(y, x)

# Fit the model
results = model.fit()

# Get the p-values for the coefficients
p_values = results.pvalues

print("P-values:", p_values)

# Close the cursor and the connection
cursor.close()
connection.close()