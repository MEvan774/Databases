using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class HighScoreScript : MonoBehaviour
{
    public DatabaseFunctions dataBase;
    public Text scoreText;

    public string _name;
    public int _score;
    public string _time;

    // Start is called before the first frame update
    void Start()
    {

    }

    // Update is called once per frame
    void Update()
    {
        TextFunction();
        
        //_name = dataBase.name;

    }

    void TextFunction()
    {
        scoreText.text = "name =" + _name + "   score =" + _score + "   Time =" + _time;
    }
}
