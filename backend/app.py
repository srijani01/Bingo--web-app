from flask import Flask, jsonify
from flask_restful import Resource, Api

app = Flask(__name__)
api = Api(app)

# set up the model

import numpy as np
import pandas as pd
import matplotlib.pyplot as plt

# %matplotlib inline
plt.style.use("ggplot")

import sklearn
from sklearn.decomposition import TruncatedSVD


# #### Loading the dataset


amazon_ratings = pd.read_csv(r"C:\Users\Lenovo\Desktop\bingo\database\ratings_Beauty_2.csv")
amazon_ratings = amazon_ratings.dropna()
amazon_ratings.head()


amazon_ratings.shape


popular_products = pd.DataFrame(amazon_ratings.groupby('ProductId')['Rating'].count())
most_popular = popular_products.sort_values('Rating', ascending=False)
most_popular.head(10)


most_popular.head(30).plot(kind = "bar")
amazon_ratings1 = amazon_ratings.head(10000)


ratings_utility_matrix = amazon_ratings1.pivot_table(values='Rating', index='UserId', columns='ProductId', fill_value=0)
ratings_utility_matrix.head()

ratings_utility_matrix.shape
X = ratings_utility_matrix.T
X.head()


X.shape


# Unique products in subset of data


X1 = X


# ### Decomposing the Matrix


SVD = TruncatedSVD(n_components=10)
decomposed_matrix = SVD.fit_transform(X)
decomposed_matrix.shape


# ### Correlation Matrix


correlation_matrix = np.corrcoef(decomposed_matrix)
correlation_matrix.shape


# correlation_matrix


# ### Isolating Product ID # 6117036094 from the Correlation Matrix
# 
# Assuming the customer buys Product ID # 6117036094 (randomly chosen)


# recommend 
def predict(x):
    X.index[99]
    i = x
    product_names = list(X.index)
    product_ID = product_names.index(i)
    product_ID
    correlation_product_ID = correlation_matrix[product_ID]
    correlation_product_ID.shape
    Recommend = list(X.index[correlation_product_ID > 0.90])
    # Removes the item already bought by the customer
    Recommend.remove(i)
    return Recommend[0:9]


class HelloWorld(Resource):
    def get(self, x_var):
        prediction = predict(x_var)
        return jsonify({"data":prediction})

api.add_resource(HelloWorld,  '/<string:x_var>')

if __name__ == '__main__':
    app.run(debug=True)