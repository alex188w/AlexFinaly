import React from "react";
import ReactDOM from "react-dom/client";
import "./index.css";
import App from "./App";
import { store } from "./store/store";
import { Provider } from "react-redux";
import CartContextProvider from './contexts/CartContext';

const root = ReactDOM.createRoot(document.getElementById("root"));
root.render(
//   <React.StrictMode>
//   <CartContextProvider>
//     <App />
//   </CartContextProvider>
// </React.StrictMode>
// );


  <React.StrictMode>
    <Provider store={store}>
      <App />
    </Provider>
  </React.StrictMode>
);
