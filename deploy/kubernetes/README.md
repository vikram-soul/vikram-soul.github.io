gcloud config set project soul-personal

gcloud container clusters create soulpersonal --num-nodes 1 --enable-basic-auth --issue-client-certificate --zone asia-south1-a

kubectl apply -k ./deploy/kubernetes


## TODO: Add these to CI pipeline

$ gcloud compute addresses create g-ingress --global
$ gcloud compute addresses describe g-ingress --global --format='value(address)'



