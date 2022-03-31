import axios from "axios";

export default axios.create({
  baseURL: "https://127.0.0.1:8000/api",
  headers: {
    "Content-type": "application/json"
  }
});