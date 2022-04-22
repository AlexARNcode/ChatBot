import axios from "axios";
import React, { useState } from "react";

export default function NewQuestion() {
    const [newQuestion, setNewQuestion] = useState("");
    const [newAnswer, setNewAnswer] = useState("");

    function addNewQuestion(newQuestionIsActive: any) {
        console.log(newQuestionIsActive);
        const dataToSend = JSON.stringify({ question: newQuestion, answer: newAnswer });

        axios.post('http://127.0.0.1:8000/questions-answers-couples', dataToSend)
        .then(function (response) {
            console.log(response);
        })
        .catch(function (error) {
            console.log(error);
        })
    }

    return (   
         <>
        <div className="mt-4 border p-3">
            <h3 className="mb-3">Nouvelle question</h3>
            <label htmlFor="userQuestion" className="form-label">Nouvelle question</label>
                <input 
                className="form-control" 
                type="text" 
                placeholder="Veuillez renseigner la nouvelle question..."
                value={newQuestion}
                onChange={e => setNewQuestion(e.target.value)}
                id="newQuestion"
                />

            <label htmlFor="userAnswer" className="form-label">Nouvelle réponse</label>
            <input 
            className="form-control mb-3" 
            type="text" 
            placeholder="Veuillez renseigner la nouvelle réponse..."
            value={newAnswer}
            onChange={e => setNewAnswer(e.target.value)}
            id="newAnswer"
            />

            <button 
              type="button" 
              className="btn btn-success" 
              onClick={addNewQuestion}
              >Enregistrer
            </button>
        </div>
         </>
         );
}