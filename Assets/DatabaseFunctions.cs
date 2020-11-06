using System;
using System.Collections;
using System.Collections.Generic;
using System.Runtime.Serialization.Json;
using UnityEditor.PackageManager.Requests;
using UnityEngine;

public class DatabaseFunctions : MonoBehaviour
{
    public HighScoreScript scoreScript;

    void Start()
    {
        //ReadDataBaseEntries();
        //GetInformationFromDatabase();
    }

    public void ReadDataBaseEntries()
    {
        string name = "UnityGPR";
        int score = 420;
        StartCoroutine(DataBaseAddRequest(name, score));
    }

    IEnumerator DataBaseAddRequest(string name, int score)
    {
        WWW request = new WWW("http://hers.hosts1.ma-cloud.nl/create.php?name="+ name +"&score=" + score);
        yield return request;
        Debug.Log(request.text);

        scoreScript._score = score;
        scoreScript._name = name;
        scoreScript._time = "no";
    }

    public void GetInformationFromDatabase()
    {
        StartCoroutine(GetEntriesRequest());
    }

    IEnumerator GetEntriesRequest()
    {
        WWW request = new WWW("http://hers.hosts1.ma-cloud.nl/read.php");
        yield return request;
        Debug.Log(request.text);
        Entries json = JsonUtility.FromJson<Entries>(request.text);
        Debug.Log(json.entries[0].score);

        scoreScript._score = json.entries[0].score;
        scoreScript._name = json.entries[0].name;
        scoreScript._time = json.entries[0].timeadded;
    }
}


[Serializable]
public struct Entries
{
    public Entry[] entries;
}

[Serializable]
public struct Entry
{
    public int score;
    public string name;
    public string timeadded;
}
